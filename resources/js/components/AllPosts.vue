<template>
    <div class="card">  
        <div class="card">
            <div class="card-header">
                    <h1>  Add New Post</h1>               
            </div>
            <div class="card-body">
                <form action="" @submit.prevent="createPost"> 
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input v-model="PostData.title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea  v-model="PostData.description" type="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Categories</label>
                        <select v-model="PostData.category_id" class="btn btn-info cat"  placeholder="Select">
                            <option v-for="(category,index) in categoryList" 
                                :value="category.id"
                                :key="index">
                                {{category.name}}
                            </option>
                        </select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Add Post</button>
                </form>
            </div>
            <div class="card-footer">
                <h4>All Post</h4>
                <div>
                    <ul class="list-group">
                        <li class="list-group-item" v-if='list.length === 0'>There are no posts yet!</li>
                        <li class="list-group-item table-striped" v-for="(PostData, index) in list" :key="index">
                            <div>
                                <h4>
                                    <strong>Title:</strong> 
                                    {{ PostData.title }}
                                </h4>
                            </div>
                            <hr>
                            <div>
                                <strong> Description:</strong>  {{PostData.description}}
                            </div>
                            <hr>
                                <a :href="'/adminhome/'+PostData.id+'/edit'" class="btn btn-primary btnedit">Edit</a>
                                <button @click="deletePost(PostData.id,index)" class="btn btn-danger">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>


export default {
    props:{
        postdata: {
            type: Array,
            required:true
        },
      
    },
   
    data()
    {
        return{
            categoryList: [],
            list: [],
            PostData: {
                title: '',
                description: '',
                category_id:''
            }
        }
    },
 
    mounted()
    {
        console.log('mounted');
        if(this.postdata)
        {
            this.list = this.postdata
            this.fetchCatgories()
        }
    },
    methods: {
        createPost() {
            let data = {
                title: this.PostData.title,
                description: this.PostData.description,
                category_id: this.PostData.category_id
            }
            console.log(data);
            axios.post('/adminhome', data)
                .then((res) => {
                    this.PostData.title = '';
                    this.PostData.description = ''; 
                    this.PostData.category_id='';
                    this.list.push(res.data.PostData);
                })
                .catch((err) => console.error(err));
        },

        deletePost(id,index) {
            axios.delete('adminhome/' + id)
            .then((res) => {
            this.list.splice(index,1)
            })
            .catch((err) => console.error(err));
            alert('Are you Sure?');
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

<style>
    .btnedit{
        margin-left: 85%;
    }
    .cat {
        width: 20%;
        margin-left: 2%;
        background: whitesmoke;
    }
</style>  
