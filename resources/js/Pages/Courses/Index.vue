<template>
    <app-layout>
        <template #header>
            Listes des formations
        </template>
        <div class="py-5" v-for="course in this.courseList" v-bind:key="course.id">
            <div class="p-3 mx-8 bg-white shadow rounded">
                <div class="text-sm text-gray-500">Mise En Ligne Par: {{ course.user.name }} -
                    <span class="text-gray-500 text-sm"> {{ course.participants }} Participant
                        <span v-if="parseInt(course.participants) > 1">s</span> </span> </div>
                <div class="text-sm text-gray-500">{{ course.description }}</div>
                <a :href="'course/' + course.id" class="bg-indigo-500 text-white px-2 py-1 text-sm rounded text-sm mt-3 hover:bg-indigo-700 inline-block">Voir la formation</a>
            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from "../../Layouts/AppLayout";
export default {

    components:{
        AppLayout
    },

    props: ['courses'],
    data() {
        return {
            courseList: this.courses
        }
    },

    mounted() {
        console.log(this.courseList);
    }
}
</script>
