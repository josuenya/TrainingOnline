<template>
    <div>
        <button class="bg-green-500 px-2 px-2 text-white rounded" @click="toggleProgress()">
            {{this.iswatched ? 'Terminer' : 'Terminer ?'}}
        </button>
    </div>
</template>

<script>
    export default {
        props: ['episodeId','watchedEpisodes'],

        data() {
            return {
                watchedEp: this.watchedEpisodes,
                iswatched: null,
            }
        },
        methods: {
            toggleProgress() {
                axios.post('/toggleProgress', {
                    episodeId: this.episodeId,
                })
                .then(response => {
                    if (response.status === 200){
                        this.iswatched = !this.iswatched;
                        eventBus.$emit('toggleProgress', response.data);
                    }
                })
                .catch(error =>console.log(error));
            },

            iswatchedEpisode(){
                return this.watchedEp.find(episode => episode.id === this.episodeId) ? true : false;
            }
        },

        mounted(){
            console.log(this.iswatched);
            this.iswatched = this.iswatchedEpisode();
        }
    }
</script>
