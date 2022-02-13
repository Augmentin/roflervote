export function getUID(){
    return Date.now().toString(36) + Math.random().toString(36).substr(2);
}

import axios from "axios";

export {Api};

class Api{
    static getSongsList(){

    }


    /**
     * @param path
     * @param data
     * @returns {Promise<AxiosResponse<any>>}
     */
    static  call(path, data, config = null){
        if( path[0] === '/' ){
            path = path.substr(1);
        }
        let url = window.location.origin+  "/kek/" + path;

        return typeof data === 'undefined' ? axios.get(url) :  axios.post(url, data, config ?? {
            headers: {
                'Content-Type': 'application/json'
            }
        });
    }
}