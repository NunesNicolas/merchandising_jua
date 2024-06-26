<template>
    <head>
        <link rel="stylesheet" href="{{ asset('assets/css/variables.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    </head>

    <main>
        <router-view :key="$route.fullPath" />
    </main>
</template>

<script></script>

<style scoped>
body{
    margin: 0;
    padding: 0;
}
#topheader{
    height:100% ;
    width: 100%;
    margin: 0;
    margin-right: 0;
    padding: 0;
    background-color: aquamarine;
}
</style>
