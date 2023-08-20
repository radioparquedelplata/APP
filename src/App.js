import React, {useState, useRef} from "react";
import "./styles/app.scss";

//imprt data
import data from "./data";

//adding components
import Player from "./components/Player";
import Song from "./components/Songs";
import Library from "./components/Library";
import Nav from "./components/Nav";

function App() {
	//ref
	const audioRef = useRef(null);
	//state
	const [songs, setSongs] = useState(data());
	const [currentSong, setCurrentSong] = useState(songs[0]);
	const [isPlaying, setIsPlaying] = useState(false);
	//state
	const [songInfo, setSongInfo] = useState ({
		currentTime: 0,
		duration: 0,
		annimationPercentage: 0,
		volume: 0,
	});
	const [libraryStatus, setLibraryStatus] = useState(false);

	const timeUpdateHandler = (e) => {
        const current = e.target.currentTime;
        const duration = e.target.duration;
		//calculate percentage
		const roundCurrent = Math.round(current);
		const roundDuration = Math.round(duration);
		const animation = Math.round((roundCurrent / roundDuration) * 100);
        setSongInfo({
			...songInfo, 
			currentTime:current, 
			duration:duration, 
			annimationPercentage:animation,
			volume: e.target.volume,
		});

    };
	const songHandler = async () => {
		let currentIndex = songs.findIndex((song) => song.id === currentSong.id);
        await setCurrentSong(songs[(currentIndex + 1) % songs.length]);
		if (isPlaying) audioRef.current.play();    
	};

    return (
    	<div className={`App ${libraryStatus ? "library-active " : ""}`}>
			<Nav libraryStatus={libraryStatus} setLibraryStatus={setLibraryStatus} />
    	    <Song 
				currentSong={currentSong} 
				isPlaying={isPlaying}
			/>
    	    <Player 
				audioRef ={audioRef}
				isPlaying={isPlaying} 
				setIsPlaying={setIsPlaying} 
				currentSong={currentSong} 
				setSongInfo={setSongInfo}
				songInfo={songInfo}
				songs={songs}
				setCurrentSong={setCurrentSong}
				setSongs={setSongs}
			/>
			<Library 
				audioRef={audioRef} 
				songs={songs} 
				setCurrentSong={setCurrentSong}
				isPlaying={isPlaying}
				setSongs={setSongs}
				libraryStatus={libraryStatus}
		    />
			<audio 
            	onTimeUpdate={timeUpdateHandler} 
            	onLoadedMetadata={timeUpdateHandler}
            	ref={audioRef} 
            	src={currentSong.audio}
				onEnded={songHandler}
			>
            </audio>
    	</div>
    );
}

export default App;
