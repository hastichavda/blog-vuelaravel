<template>
    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="addCat">
                <div class="form-group">
                    <label for="">Category:</label>
                    <input v-model="catdata.name" type="text" class="form-control">
                </div>
                <button type="submit"  class="btn btn-primary">Add Category</button>
            </form>
        </div>
         <div class="card-footer">
               <h4>All Category</h4>
       <ul class="list-group">
           <li class="list-group-item" v-if='categoryList.length === 0'>There are no Category yet!</li>
           <li class="list-group-item table-striped" v-for="(category, index) in categoryList" :key="index">
              {{ category.name }}
              <hr>
               <button @click="deleteCat(category.id,index)" class="btn btn-danger  btndel">Delete</button>
           </li>
       </ul>
     </div>
    </div>
  
</template>
<script>
export default {
    props:{
        allcategory:
        {
            type: Array,
            required:true
        } 
    },
    data()
    {
        return{
            categoryList : [],
            catdata:{
                name:''
            }
        }
    },
    mounted(){
        console.log('mounted');
        if(this.allcategory)
        {
            this.categoryList = this.allcategory;
        }
    },
    methods:
    {
       async addCat() {
             let data = {
                   name: this.catdata.name
               }
               console.log(data);
               axios.post('/category', data)
                   .then((res) => {
                       this.catdata.name = '';
                       this.categoryList.push(res.data.catdata);
                   })
                   .catch((err) => console.error(err));
           },  

        deleteCat(id,index) {
            axios.delete('/category/' + id)
            .then((res) => {
            this.categoryList.splice(index,1)
            })
            .catch((err) => console.error(err));
         
        }
    }
    }
</script>

<style>
    .btndel {
        margin-left: 85%;
    }
</style>