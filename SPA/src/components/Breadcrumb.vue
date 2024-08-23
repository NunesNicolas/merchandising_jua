<template>
    <div class="d-flex" style="width: 100%; height: 5vh; justify-content: space-between; padding: 10px;">
        <p class="ml-4 mr-auto" style="color: #2c9aff; font-weight: bold; font-size: 4vh;">{{ pageTitle }}</p>
        <p class="mr-3" style="color: #858585; font-weight: bold; font-size: 3vh;">{{ routeInfo }}</p>
    </div>
</template>

<script>
export default {
    name: 'Breadcrumb',
    props: {
        pageTitle: {
            type: String,
            required: true
        },
        routeInfo: {
            type: String,
            required: true
        }
    }
};
</script>