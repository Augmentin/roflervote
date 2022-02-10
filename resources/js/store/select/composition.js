import mutations from "./mutations";
import * as actions from "./actions";
import * as getters from './getters'

const state = {
    musicObjects:[],
}

export const moduleSelect= {
    namespaced: true,
    state:() => (state),
    mutations: mutations,
    actions:  actions ,
    getters: getters
}