<template>
    <div class="card-body">
        <div class="card-title">{{question.question}}<br>
            <ul class="list-group">
                <li class="list-group-item" v-for="(answer,key) in question.answers">
                    <input type="radio" name="key" :id="key"> <label :for="key" :value="answer.id">{{answer.answer}}</label>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props:['question'],
        name:'question'
    }
</script>
