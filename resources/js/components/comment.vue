<template>
    <div class="comment">
        <div class="comment_author">
            <div class="comment_author_photo"><img width="100%" src="https://files.virgool.io/upload/users/33643/avatar/ZeJuOA.png" alt=""></div>
            <div class="comment_author_details">
                <div class="comment_owner_fullname">Mohammad Asadi</div>
                <div class="comment_date">2022-01-30 15:06</div>
            </div>
        </div>
        <article class="comment_content">
            {{ comment_text }}
        </article>

    </div>
</template>

<script>
export default {
    name: "comment" ,
    props: ['comment_text']
}
</script>

<style scoped>
.comment{
    background-color: #f5f5f5;
    padding: 17px;
}
.comment_author_photo{
    max-width: 35px;
    display: inline-block;
    border-radius: 30px;
    overflow: hidden;
}
.comment_author_details{
    display: inline-block;
    vertical-align: top;
    margin-left: 10px;
}
.comment_owner_fullname{
    color: #107abe;
    font-size: 14px;
}
.comment_date{
    font-size: 10px;
}
.comment_content {
    margin-top: 15px;
}
</style>
