<template>
    <div>
        <section class="new_comment">
            <input type="text" class="comment_enter_name" placeholder="Enter your name ..." v-model="fullname">
            <textarea class="comment_textarea" v-model="text" rows="3" placeholder="write your comment here ..."></textarea>
            <button class="submit_comment_btn" @click="submit">Submit</button>
        </section>
    </div>
</template>

<script>
export default {
    name: "new_comment" ,
    props: ['reply_to' , 'article'] ,
    data(){
        return {
            fullname: null,
            text: null ,
        }
    } ,
    methods:{
        submit(){
            let data = this
            if(data.fullname === null){
                alert('enter your full name')
            }else if (data.text === null){
                alert('enter your comment')
            }else{
                axios.post('/comments/new' , {
                    'name' : data.fullname ,
                    'comment' : data.text ,
                    'reply_to' : data.reply_to ,
                    'article_id': data.article
                }).then(function (response) {
                    if(response.status === 200){
                        if(response.data.message === 'comment saved successfully.'){
                            // Message published successfully
                            alert('Comment saved. wait to admin accepts your comment.')
                            data.fullname = null
                            data.text = null
                        }
                    }
                }).catch(function (error) {
                   alert('an error was encountered')
                })
            }
        }
    }
}
</script>

<style scoped>
.new_comment {
    margin-bottom: 20px;
}
.comment_textarea {
    width: 100%;
    margin-top: 15px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
    padding: 10px;
}
.comment_enter_name{
    width: 100%;
    padding: 10px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
}
.submit_comment_btn{
    width: 100%;
    border: none;
    padding: 13px;
    border-radius: 5px;
    background: #00bf4a;
    color: #fff;
}
</style>
