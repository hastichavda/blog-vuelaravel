<template>
    <div class="card">
        <div class="card-header">
            <h1>Edit Posts</h1>
        </div>
        <div class="card-body">
            <form @submit.prevent="updatePost">
                <div class="form-group">
                    <label for="">Post Title</label>
                    <input type="text" v-model="formData.title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea type="text" v-model="formData.description" class="form-control" rows="5"></textarea>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">category:</label>
                    <div v-for="(category, index) in formData.categories" :key="index">
                                    {{ category.name}}
                    </div>
                </div>
                <hr>
               <div class="form-group">
                        {{ selectedCategories }}
                        <label for="">Categories</label>
                        <select v-model="selectedCategories" multiple>
                            <option v-for="(category,index) in categoryList" 
                                :value="category.id"
                                :key="index">
                                {{category.name}}
                            </option>
                        </select>                     
                    </div>
                <button type="submit" class="btn btn-info">Update</button>        
            </form>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        post:{
            type:Object,
            required:true
        }
    },
    data () {
        return {
            selectedCategories:[],
            categoryList:[],
            list:[],
            formData: {
                title: '',
                description: '',
            }
        }
    },
    mounted () {
        if(this.post)
        {
            this.formData.title = this.post.title;
            this.formData.description = this.post.description;
            this.formData.categories = this.post.categories;
              this.fetchCatgories();
        }
    },
    methods: {
        async fetchData (id) {
            let res = await axios.get('/adminhome/' + this.$route.params.id + '/edit')

            if (res.data) {
               this.formData.title = res.data.PostData.title
               this.formData.description = res.data.PostData.description
               this.formData.categories = res.data.PostData.categories
            }
        },

        async updatePost (e) {
            
            let data = {
                title: this.formData.title,
                description: this.formData.description,
                categories:this.selectedCategories
            }
            let res = await axios.put('/adminhome/' + this.post.id, data)
        },

          async fetchCatgories () {
            let res = await axios.get('/category')
            if (res.data) {
                this.categoryList = res.data.categories
            }
        }
    }

}
</script>
