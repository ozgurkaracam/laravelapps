<template>
    <div class="card">
        <div class="card-header display-4">{{quiz.name}}
            <span class="float-right ">{{selectQuestion+1}}/{{questions.length}}</span>
        </div>
        <div class="card-body">
            <div class="font-weight-bold text-primary justify-content-end float-right">
                Duration: {{ (parseInt(this.duration/60)).toString().length==1 ? '0'+parseInt(this.duration/60)  : parseInt(this.duration/60) }}:{{ (parseInt(this.duration%60)).toString().length==1 ? "0"+this.duration%60 : parseInt(this.duration%60) }}
            </div>
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
                finish:false,
                duration:this.quiz.duration*60,
                totalduration:0
            }
        },
        created() {
            this.selectQuestion=0
            this.$store.commit('initApp',{'questions':this.questions, 'quiz':this.quiz})
            setTimeout(()=>{
                this.duration--
            },1000);
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
            },
            duration(){
                if(this.duration<=0){
                    this.finishExam()
                }else{
                setTimeout(()=>{
                    this.duration--
                },1000);
                }
            }
        }

    }
</script>
