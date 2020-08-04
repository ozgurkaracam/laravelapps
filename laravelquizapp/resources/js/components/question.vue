<template>
    <div class="card-body">
        <div class="card-title">{{question.question}}<br>
            <ul class="list-group">
                <li class="list-group-item" v-for="(answer,key) in question.answers">
                    <input type="radio" v-model="selectedAnswer" name="key" :id="key" :value="answer"> <label :for="key" >{{answer.answer}}</label>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props:['question'],
        name:'question',
        data(){
            return{
                selectedAnswer:{}
            }
        },
        methods:{
        },
        watch:{
            selectedAnswer(){
                this.$store.commit('selectAnswer',this.selectedAnswer)
                this.$store.dispatch('storeanswer',this.selectedAnswer)
            }
        }
    }
</script>
