<template>
    <div class="article_details">

        <!-- INTRODUCE AUTHOR -->
        <section class="author">
            <img :src="article.writer.profile_photo" :alt="article.writer.firstName">
            <div class="author_info">
                <div class="author_fullname">
                    {{ article.writer.firstName }} {{ article.writer.lastName }} <span class="follow_btn">+ Follow</span>
                </div>
                <div class="author_description">
                    {{article.writer.description}}
                </div>
                <div class="article_publish_date">
                    {{ article.created_at }}
                </div>
            </div>
        </section>

        <!-- ARTICLE TITLE -->
        <h1 class="article_title">
           {{article.title}}
        </h1>

        <!-- ARTICLE COVER PHOTO -->
        <section class="article_photo">
            <img :src="article.cover" :alt="article.title " width="100%">
        </section>

        <!-- ARTICLE TEXT -->
        <article v-html="article.article" class="article_main_box"></article>

        <!-- ARTICLE TAGS -->
        <section class="article_tags">
            <a class="tag" :href="`/tags/` + tag.id" v-for="tag in article.tags">{{tag.tag}}</a>
        </section>

        <hr>

        <!-- ARTICLE COMMENTS -->
        <section class="comments">
            <h6 class="comments_title">Comments</h6>

            <new_comment />
            <span v-for="comment in comments">
                <comment :info="comment" :article_id="article.id" :data="comments_data" />
            </span>
        </section>

    </div>
</template>

<script>
export default {
    name: "article" ,
    props: ['article'] ,
    data(){
        return {
            comments : {} ,
            comments_data: {}
        }
    },
    created() {
        // Checking comments
        let data = this
        data.article.comments.forEach(function(value, index){
            if(value.reply_to == null) {
                data.comments[value.id] = value
            }else{
                let order
                if(data.comments[value.reply_to]){
                    order = 2
                }else{
                    order = 3
                }


                if(order === 2) {
                    if (!data.comments_data[value.reply_to]) data.comments_data[value.reply_to] = []
                    data.comments_data[value.reply_to].push({
                        id: value.id,
                        reply_to: value.reply_to,
                        comment_text: value.comment_text,
                        comment_author: value.comment_author,
                        num: order
                    })
                }

                else if (order === 3){
                    if (!data.comments_data[value.reply_to]) data.comments_data[value.reply_to] = []
                    data.comments_data[value.reply_to].push({
                        reply_to: value.reply_to ,
                        id: value.id ,
                        comment_text: value.comment_text ,
                        comment_author: value.comment_author ,
                        num: order ,
                    })
                }
            }
        })

        console.log(data.comments_data)

    }
}
</script>

<style scoped>
.author img {
    max-width: 100px;
    border-radius: 150px;
}
.article_details {
    max-width: 750px;
    margin: 60px auto;
}
.author_info {
    display: inline-block;
    margin: 10px 5px;
    vertical-align: top;
}
.author_fullname {
    font-size: 1.2em;
    font-weight: 700;
    margin-left: 0.5rem;
}
.follow_btn{
    align-items: center;
    background-color: #4b4b4b;
    color: #fff;
    min-width: 7rem;
    cursor: pointer;
    position: relative;
    text-align: right;

    font-size: .75rem;
    padding: 0.55rem 1.5rem;
    border-radius: 99rem!important;
    vertical-align: middle;
}
.author_description{
    opacity: 0.7;
    margin-left: 10px;
    line-height: 35px;
    font-size: 0.85rem;
}
.article_publish_date{
    margin-left: 10px;
    font-size: 0.75rem;
    line-height: 20px;
    font-weight: bold;
}
.article_title{
    font-size: 30px;
    font-weight: bold;
    margin-top: 35px;
    line-height: 60px;
}
.article_main_box{
    line-height: 35px;
    font-size: 18px;
    margin-top: 15px;
}
.article_tags{
    margin-top: 50px;
}
.tag {
    text-decoration: none;
    background: #eee;
    color: #666;
    padding: 7px 20px;
    margin: 8px;
    border-radius: 5px;
}
.comments {
    margin: 30px auto;
    max-width: 750px;

}
.comments_title{
    color: #6e6e6e;
    font-size: .8rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

@media only screen and (max-width: 900px){
    .article_details {
        max-width: 95%;
    }
    .author {
         width: max-content;
         margin: 0 auto;
     }
}
@media only screen and (max-width: 600px){

    .author {
        display: none;
    }
    .article_title {
        font-size: 20px;
    }

}
</style>
