<template>
    <div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="select2-single form-control" v-model="selectedcategory" name="category_id" id="category_id">

                            <option v-for="category in categories"  :value="category.id">{{category.name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory_id">Sub Category</label>
            <select class="select2-single form-control" name="subcategory_id" id="subcategory_id">
                <option v-for="subcategory in subcategories" :value="subcategory.id">{{subcategory.name}}</option>
            </select>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import { SITE_URL} from "../../../config";

    export default {
        name:'selectcategory',
        props:['categories'],
        data(){
            return{
                subcategories:null,
                selectedcategory:null,
                subcategories:null
            }
        },
        watch:{
            selectedcategory(){
                axios.get(SITE_URL+'/subcategories/load/'+this.selectedcategory).then(res=>{
                    this.subcategories=[]
                    res.data.forEach(dt=>this.subcategories.push(dt))

                })
            }
        },
        created() {

        }
    }
</script>
