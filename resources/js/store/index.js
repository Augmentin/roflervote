import { createStore, createLogger } from 'vuex'
import {moduleSelect} from './select/composition';

import commonMutations from "./common/mutations"
const commonState = {
    alerts:[]
}

export default createStore({
    modules:{
        select: moduleSelect,

    },
    state:() => (commonState),

    mutations:commonMutations,
    plugins: [createLogger()]
})
