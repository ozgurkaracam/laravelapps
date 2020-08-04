import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        answers:[],
        selectquestion:0,
        quizid:0,
        correctanswers:0
    },
    mutations:{
        initApp(state,payload){
            state.answers=Array(payload.questions.length).fill(false);
            state.selectquestion=0
            state.quizid=payload.quiz.id

        },
        // @TODO buradan devam..
        selectAnswer(state,answer){
            if(answer.is_correct==1){
                state.answers[state.selectquestion]=true
                state.correctanswers++
            }

            else
                state.answers[state.selectquestion]=answer.answer
        },
        selectquestion(state,selectquestion){
            state.selectquestion=selectquestion
        },
        finishExam(state){
            return state.correctanswers
        }
    },
    actions:{
        storeanswer({state},selectanswer){
            axios.post("/quiz/"+state.quizid+"/start",{
                'question': selectanswer.question_id,
                'answer':selectanswer.id
            }).then(data=>{
                console.log(data)
            }).catch(err=>console.log(err))
        }
    },
    getters:{}
})
