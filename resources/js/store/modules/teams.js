const teams = {
    actions: {
        GET_TEAMS({commit}) {
            return new Promise((resolve) => {
                axios.get(`/api/teams`).then(response => {
                    if(response.data.result) {
                        resolve(response.data.teams);
                        commit('SET_TEAMS', response.data.teams);
                    }
                });
            });
        },
    },
    mutations: {
        SET_TEAMS(state, data) {
            state.teams = data;
        },
    },
    state: {
        teams: []
    },
    getters: {
        getTeams: state => state.teams,
    }
}

export default teams;