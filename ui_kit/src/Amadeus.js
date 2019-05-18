//  DHDJ FOUNDATION
//  ____  _   _ ____      ___        _______ ___ ____    _
// |  _ \| | | |  _ \    | \ \      / / ____|_ _|  _ \  / \
// | | | | |_| | | | |_  | |\ \ /\ / /|  _|  | || | | |/ _ \
// | |_| |  _  | |_| | |_| | \ V  V / | |___ | || |_| / ___ \
// |____/|_| |_|____/ \___/   \_/\_/  |_____|___|____/_/   \_\
// ロリコンでよかったわ
// 你是萝莉控真是太好了

import axios from 'axios';

export class Amadeus {

    static config = { // 你是我万水千山的冒险 要找的标记点
        api:"/api",
        dev: true,
    };

    static info = {
        version: "1.0"
    }
    static api(action){
        return this.config.api+ action
    }

    static getinfo(){
        if(this.config.dev){
            console.log(   "\n" +
                " ______                              __                             \n" +
                "/\\  _  \\                            /\\ \\                            \n" +
                "\\ \\ \\L\\ \\     ___ ___       __      \\_\\ \\      __   __  __    ____  \n" +
                " \\ \\  __ \\  /' __` __`\\   /'__`\\    /'_` \\   /'__`\\/\\ \\/\\ \\  /',__\\ \n" +
                "  \\ \\ \\/\\ \\ /\\ \\/\\ \\/\\ \\ /\\ \\L\\.\\_ /\\ \\L\\ \\ /\\  __/\\ \\ \\_\\ \\/\\__, `\\\n" +
                "   \\ \\_\\ \\_\\\\ \\_\\ \\_\\ \\_\\\\ \\__/.\\_\\\\ \\___,_\\\\ \\____\\\\ \\____/\\/\\____/\n" +
                "    \\/_/\\/_/ \\/_/\\/_/\\/_/ \\/__/\\/_/ \\/__,_ / \\/____/ \\/___/  \\/___/ \n" +
                "                                                                    \n" +
                " Amadeus Panel Version "+ this.info.version +" By LixWorth github: https://github.com/steinsmc \n " +
                "开发模式 API：" + this.config.api);
            console.warn("当前出于开发模式 debug代码以及日志会出现！");
        }else{
            console.log("\n" +
                " ______                              __                             \n" +
                "/\\  _  \\                            /\\ \\                            \n" +
                "\\ \\ \\L\\ \\     ___ ___       __      \\_\\ \\      __   __  __    ____  \n" +
                " \\ \\  __ \\  /' __` __`\\   /'__`\\    /'_` \\   /'__`\\/\\ \\/\\ \\  /',__\\ \n" +
                "  \\ \\ \\/\\ \\ /\\ \\/\\ \\/\\ \\ /\\ \\L\\.\\_ /\\ \\L\\ \\ /\\  __/\\ \\ \\_\\ \\/\\__, `\\\n" +
                "   \\ \\_\\ \\_\\\\ \\_\\ \\_\\ \\_\\\\ \\__/.\\_\\\\ \\___,_\\\\ \\____\\\\ \\____/\\/\\____/\n" +
                "    \\/_/\\/_/ \\/_/\\/_/\\/_/ \\/__/\\/_/ \\/__,_ / \\/____/ \\/___/  \\/___/ \n" +
                "                                                                    \n" +
                " Amadeus Panel Version "+ this.info.version +" By LixWorth github: https://github.com/steinsmc ");
        }

    }

    static log(log){
        if(this.config.dev){
            console.log(log);
        }
    }

    static error(log){
        if(this.config.dev){
            console.error(log + " \nISSUE: https://github.com/steinsmc/Amadeus/issue");
        }
    }


}

