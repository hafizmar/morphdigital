<template>
    <div class="page-header">
        <div class="page-header-content">
            <h4 class="page-title">{{ title }} - <span class="page-title-light">Dashboard</span></h4>
        </div>
        <div class="page-header-content border-top">
            <div class="breadcrumb">
                <a href="/dashboard" class="breadcrumb-item"><font-awesome-icon icon="house" /></a>
                <a href="#" class="breadcrumb-item">{{ title }}</a>
                <span class="breadcrumb-item active">Dashboard</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['title']

}
</script>

<style lang="css">
.breadcrumb {
    margin-bottom: 0;
}
</style>