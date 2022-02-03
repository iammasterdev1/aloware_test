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

            <comment :comment_text="`This is Good`" />

        </section>

    </div>
</template>

<script>
export default {
    name: "article" ,
    props: ['article'] ,
    data(){
        return {
            comment_active: false,
            reply_to: null
        }
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
    margin: 100px auto;
    max-width: 750px;

}
.comments_title{
    color: #6e6e6e;
    font-size: .8rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

</style>
