// alert("Hello from JavaScript!");


let count = 1;
let analysis_data = [];

// loadJsonData();



const loadJsonData = async ()=> {
    await fetch('stream-for-all-pages.json').then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse JSON response
    })
    .then(data => {
        // Now you have the JSON data, you can work with it
        console.log('LOADED.....', data);
        analysis_data = data;
    })
    .catch(error => {
        console.error('There was a problem fetching the JSON file:', error);
    });


}

    console.log('display_data ', analysis_data);