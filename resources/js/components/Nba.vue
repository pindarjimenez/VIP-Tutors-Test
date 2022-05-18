<template>
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4 img-fluid" src="/images/logo.png">
            <h2>{{ title }}</h2>
        </div>  
        
        <div class="accordion" id="nba-accordion">
            <div class="card" v-for="(item, index) in getTeams" :key="index">
                <div class="card-header" :id="`${item.code}-heading`">
                    <h1 class="mb-0">
                        <button 
                            class="btn btn-link btn-block text-left" 
                            type="button" 
                            data-toggle="collapse" 
                            aria-expanded="true" 
                            :data-target="`#${item.code}-collapse`" 
                            :aria-controls="`#${item.code}-collapse`"
                        >
                            {{ item.name  }}
                        </button>
                    </h1>
                </div>  

                <div :id="`${item.code}-collapse`" class="collapse" :aria-labelledby="`${item.code}-heading`" data-parent="#nba-accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6" v-for="roster in item.rosters" :key="roster.id">
                                <div class="card mb-3">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>{{ roster.name }}</h4>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statisticModal" @click.prevent="viewStatistic(roster.statistic)">
                                            Statistic
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div><strong>Name:</strong> </div>
                                        <div><strong>Number:</strong> {{ roster.number }}</div>
                                        <div><strong>Position:</strong> {{ roster.pos }}</div>
                                        <div><strong>Weight:</strong> {{ roster.weight }}</div>
                                        <div><strong>Height:</strong> {{ roster.height }}</div>
                                        <div><strong>Years of Experience:</strong> {{ roster.years_exp }}</div>
                                        <div><strong>College:</strong> {{ roster.college }}</div>
                                        <div><strong>Date of Birth:</strong> {{ moment(roster.dob).format('YYYY-MM-DD') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2022 by Pindar Jimenez</p>
            <ul class="list-inline">
                <li class="list-inline-item" v-for="(item, index) in externalLinks" :key="index">
                    <a :href="item.url">{{ item.name }}</a>
                </li>
            </ul>
        </footer>

        <div class="modal fade show" id="statisticModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Player Statistics</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong>2 Pts</strong>: {{ statistics['2pt'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>3 Pts</strong>: {{ statistics['3pt'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Assists</strong>: {{ statistics['assists'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Field Goals</strong>: {{ statistics['field_goals'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Free Throws</strong>: {{ statistics['free_throws'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Games</strong>: {{ statistics['games'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Defensive Rebounds</strong>: {{ statistics['defensive_rebounds'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Steals</strong>: {{ statistics['steals'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Personal Fouls</strong>: {{ statistics['personal_fouls'] }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong>2 Pts Attempted</strong>: {{ statistics['2pt_attempted'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>3 Pts Attempted</strong>: {{ statistics['3pt_attempted'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Blocks</strong>: {{ statistics['blocks'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Field Goals Attempted</strong>: {{ statistics['field_goals_attempted'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Free Throws Attempted</strong>: {{ statistics['free_throws_attempted'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Games Started</strong>: {{ statistics['games_started'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Offensive Rebounds</strong>: {{ statistics['offensive_rebounds'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Turnovers</strong>: {{ statistics['turnovers'] }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Minutes Played</strong>: {{ statistics['minutes_played'] }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    
    export default {
        components: {
            Comment: ()  => import('./Comment'),
        },
        data() {
            return {
                title: 'NBA Test Exam',
                externalLinks: [
                    {
                        name: 'Resume',
                        url: 'https://pindarjimenez.github.io'
                    },
                    {
                        name: 'LinkedIn',
                        url: 'https://ph.linkedin.com/in/pindar-jimenez-558292131'
                    },
                    {
                        name: 'Github',
                        url: 'https://github.com/pindarjimenez'
                    }
                ],
                statistics: {}
            }
        },
        mounted () {
            this.$store.dispatch("GET_TEAMS");
        },
        computed: {
            ...mapGetters([
                'getTeams',
            ]),
        },
        methods: {
            viewStatistic(item) {
                console.log(item);
                this.statistics = item;
            }
        },
    }
</script>

<style lang="scss">
</style>