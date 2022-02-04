<template>
    <header class="header_main">
        <!-- LOGO -->
        <div class="logo_box">
            <img src="https://aloware.com/wp-content/uploads/2020/07/Aloware-Logo-Dark.png" alt="Logo">
        </div>

        <div class="right_tools">

            <div class="search_icon">
                <svg height="22" viewBox="0 0 18 18" width="22" fill="#8e8e8e">
                    <rect fill="#ff13dc" opacity="0" width="22" height="22"></rect>
                    <path d="M16.5865,15.107,12.7,11.2215A6.413,6.413,0,1,0,11.2215,12.7l3.886,3.886a1.05,1.05,0,0,0,1.479-1.479ZM3,7.5A4.5,4.5,0,1,1,7.5,12,4.5,4.5,0,0,1,3,7.5Z"></path>
                </svg>
            </div>

            <div class="notification_icon">
                <svg x="0px" y="0px" width="20px" height="20px" viewBox="0 0 510 510" class="page_speed_1164095911" fill="#8e8e8e" xml:space="preserve">
                    <g id="notifications-none">
                        <path d="M255,510c28.05,0,51-22.95,51-51H204C204,487.05,226.95,510,255,510z M420.75,357V216.75 c0-79.05-53.55-142.8-127.5-160.65V38.25C293.25,17.85,275.4,0,255,0c-20.4,0-38.25,17.85-38.25,38.25V56.1 c-73.95,17.85-127.5,81.6-127.5,160.65V357l-51,51v25.5h433.5V408L420.75,357z M369.75,382.5h-229.5V216.75 C140.25,153,191.25,102,255,102s114.75,51,114.75,114.75V382.5z"></path>
                    </g>
                </svg>
            </div>

            <div class="profile_image">
                <img src="https://www.thispersondoesnotexist.com/image" alt="Mohammad Asadi" width="100%">
            </div>

        </div>

    </header>
</template>

<script>
export default {
    name: "header"
}
</script>

<style scoped>
    .header_main {
        padding: 25px 15px;
    }
    .logo_box img {
        width: 100%;
    }
    .logo_box {
        display: inline-block;
        max-width: 150px;
    }
    .right_tools{
        display: inline-block;
        float: right;
        color: #8e8e8e;
    }
    .right_tools div {
        display: inline-block;
        margin: 0 12px;
        vertical-align: middle;
    }
    .right_tools div svg {
        height: 100%;
        padding: 18% 0;
    }
    .profile_image{
        width: 40px;
        overflow: hidden;
        border-radius: 20px;
    }
    @media only screen and (max-width: 600px){
        .search_icon, .notification_icon {
            display: none !important;
        }
    }

</style>
