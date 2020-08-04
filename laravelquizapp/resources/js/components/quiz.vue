<template>
    <div class="card">
        <div class="card-header display-4">{{quiz.name}}
            <span class="float-right ">{{selectQuestion+1}}/{{questions.length}}</span>
        </div>
        <div class="card-body">
            <question v-if="!finish" :question="questions[selectQuestion]"></question>
            <h1 v-else>Correct Answers: {{$store.state.correctanswers}} / {{questions.length}}</h1>

        </div>
        <div class="card-footer px-6">
            <button class="btn btn-danger" v-if="!finish" @click="selectQuestion--">Prev</button>
            <button class="btn btn-info float-right" v-if="selectQuestion<questions.length-1" @click="selectQuestion++">Next</button>
            <button class="btn btn-success float-right" v-if="selectQuestion==questions.length-1" @click="finishExam">Finish!</button>
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
                selectQuestion:0,
                finish:false
            }
        },
        created() {
            this.selectQuestion=0
            this.$store.commit('initApp',{'questions':this.questions, 'quiz':this.quiz})
        },
        methods:{
            finishExam(){
                this.finish=true
                console.log(this.$store.state.correctanswers)
            }
        },
        watch:{
            selectQuestion(){
                if(this.selectQuestion<=0)
                    this.selectQuestion=0
                else if(this.selectQuestion>=this.questions.length-1)
                    this.selectQuestion=this.questions.length-1
                this.$store.commit('selectquestion',this.selectQuestion)
            }
        }

    }
</script>
