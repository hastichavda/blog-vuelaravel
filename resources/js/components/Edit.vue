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
                    <textarea type="text" v-model="formData.description" class="form-control"></textarea>
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
            list:[],
            formData: {
                title: '',
                description: ''
            }
        }
    },
    mounted () {
        if(this.post)
        {
            this.formData.title = this.post.title;
            this.formData.description = this.post.description;
        }
    },
    methods: {
        async fetchData (id) {
            let res = await axios.get('/adminhome/' + this.$route.params.id + '/edit')

            if (res.data) {
               this.formData.title = res.data.PostData.title
               this.formData.description = res.data.PostData.description
            }
        },

        async updatePost (id) {
            let data = {
                title: this.formData.title,
                description: this.formData.description,
            }
            let res = await axios.put('/adminhome/' + this.post.id, this.formData)
        }
    }

}
</script>
