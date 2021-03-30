<template>
    <app-layout>
        <template #header>
            {{course.title}}
        </template>
        <div class="py-5">
            <div class="text-sm text-gray-500">{{ course.episodes[1].title }}</div>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/SlX03hcCayE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="p-3 mx-8 bg-white shadow rounded">
                <div class="text-sm text-gray-500">Mise En Ligne Par: {{ course.user.name }}</div>
                <div class="flex justify-between items-center">
                </div></div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from "../../Layouts/AppLayout";
export default {

    components:{
        AppLayout
    },

    props: ['course'],
    data() {
        return {
            courseShow: this.course
        }
    },

    mounted() {
        //console.log(this.courseList);
    }
}
</script>
