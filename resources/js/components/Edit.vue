<template>
    <div class="card">
        <div class="card-header">
            <h1>Edit Posts</h1>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="">Post Title</label>
                    <input type="text" v-model="formData.title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea type="text" v-model="formData.description" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                 <select v-model="formData.category_id" class="btn btn-info cat"  placeholder="Select">
                    <option v-for="(category,index) in categoryList" 
                        :value="category.id"
                        :key="index">
                        {{category.name}}
                    </option>
                </select>
                </div>
                <button type="submit" class="btn btn-info" @click="updatePost">Update</button>        
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
            categoryList:[],
            list:[],
            formData: {
                title: '',
                description: '',
                category_id:''
            }
        }
    },
    mounted () {
        if(this.post)
        {
            this.formData.title = this.post.title;
            this.formData.description = this.post.description;
            this.formData.category_id = this.post.category_id;
              this.fetchCatgories();
        }
    },
    methods: {
        async fetchData (id) {
            let res = await axios.get('/adminhome/' + this.$route.params.id + '/edit')

            if (res.data) {
               this.formData.title = res.data.PostData.title
               this.formData.description = res.data.PostData.description
               this.formData.category_id = res.data.PostData.category_id
            }
        },

        async updatePost (id) {
            let data = {
                title: this.formData.title,
                description: this.formData.description,
                category_id:this.formData.category_id
            }
            let res = await axios.put('/adminhome/' + this.post.id, this.formData)
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
