function is_favourite(url){

  var request = new XMLHttpRequest();
request.onreadystatechange = function (){
if (request.readyState == 4) {
  if (request.status == 200) {
    alert('Musique Ajouté à vos favoris');
  }
}
};
request.open('POST','./is_favourite.php');
request.setRequestHeader('Content-type','application/x-www-form-urlencoded');

var params = [
  `url=${url}`
];

request.send(params);

}
