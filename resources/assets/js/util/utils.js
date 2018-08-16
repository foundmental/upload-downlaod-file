import Axios from 'axios'
import localforage from 'localforage'

localforage.config({
    driver: localforage.LOCALSTORAGE
})

export default {

    shuffle (a) {
        var shuffled = new Array()

        for (var i = 0; i < a.length; i++) {
            shuffled.push(a[i])
        }
        
        for (let i = shuffled.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
        }
        
        return shuffled;
    },

    sleep (ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    },

    devEnvironment () {
        return process.env.NODE_ENV === 'development' || process.env.NODE_ENV === 'local'
    },

    iOS () {
        var iDevices = [
            'iPad Simulator',
            'iPhone Simulator',
            'iPod Simulator',
            'iPad',
            'iPhone',
            'iPod'
        ];

        if (!!navigator.platform) {
            while (iDevices.length) {
                if (navigator.platform === iDevices.pop()){ return true; }
            }
        }

        return false;
    },

    downloadAndStore (key, url) {
        return new Promise((resolve, reject) => {
            Axios.get(url, {responseType: 'blob'})
                .then(result => {
                    localforage.setItem(key, result.data)
                    resolve(result.data)
                })
                .catch(error => {
                    reject(error)
                })
        })
    }

}