<template>
    <app-layout>
        <template #header>
            {{ course.title }}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl text-gray-500">{{ this.courseShow.episodes[this.currentKey].title }}</div>
            <iframe class="w-full h-screen" :src="this.courseShow.episodes[this.currentKey].video_url" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="text-sm text-gray-500">{{ this.courseShow.episodes[this.currentKey].description }}</div>

            <div class="mt-6">
                <ul class="" v-for="(episode, index) in this.courseShow.episodes" v-bind:key="episode.id">
                    <li class="mt-3">{{episode.title}} - n {{index + 1 }}</li>
                    <button class="text-gray-500 focus:text-indigo-600 focus:outlin-none" @click="switchEpisode(index)">Voir l'episode</button>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from "../../Layouts/AppLayout";
import Button from "../../Jetstream/Button";
export default {

    components:{
        Button,
        AppLayout
    },

    props: ['course'],
    data() {
        return {
            courseShow: this.course,
            currentKey: 0,
        }
    },

    methods:{
        switchEpisode(index){
            this.currentKey = index;

            window.scrollTo({
                top:0,
                left:0,
                behavior: 'smooth',
            })
        }

    },



    mounted() {
        //console.log(this.courseList);
    }
}
</script>
