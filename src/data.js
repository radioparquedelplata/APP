import { v4 as uuidv4 } from "uuid"; 

function chillHop() {
    return [

        
        {
            name:"Hits for Kids",
            artist: "Kids",
            cover: "https://png.pngtree.com/png-vector/20190726/ourlarge/pngtree-modern-square-cool-music-for-party-lights-png-image_1629696.jpg",
            id: uuidv4(),
            color: ["#008781", "#cfc08c"],
            audio: "http://s1-webradio.antenne.de/hits-fuer-kids/stream/mp3?aw_0_1st.playerid=tunein.com",
            active: false,
        },
    ];
}

export default chillHop;

