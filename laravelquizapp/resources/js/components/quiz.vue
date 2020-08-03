<template>
    <div class="card">
        <div class="card-header display-4">{{quiz.name}}
            <span class="float-right ">{{selectQuestion+1}}/{{questions.length}}</span>
        </div>
        <div class="card-body">
            <question :question="questions[selectQuestion]"></question>

        </div>
        <div class="card-footer px-6">
            <button class="btn btn-danger" @click="selectQuestion--">Prev</button>
            <button class="btn btn-info float-right" v-if="selectQuestion<questions.length-1" @click="selectQuestion++">Next</button>
            <button class="btn btn-success float-right" v-if="selectQuestion==questions.length-1">Finish!</button>
        </div>

    </div>
</template>
<script>
    import question from './question'
    export default {
        name:'quiz',
        props:{'quiz':Object,'user':Object,'questions':Array},
        components: {question},
        data(){
            return{
                selectQuestion:0
            }
        },
        created() {
            this.selectQuestion=0
        },
        watch:{
            selectQuestion(){
                if(this.selectQuestion<=0)
                    this.selectQuestion=0
                else if(this.selectQuestion>=this.questions.length-1)
                    this.selectQuestion=this.questions.length-1
            }
        }

    }
</script>
