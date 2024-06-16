document.addEventListener('DOMContentLoaded', () => {
   const addMovieForm = document.getElementById('add-movie-form');
   const moviesTable = document.getElementById('movies-table').querySelector('tbody');
   const bookingsTable = document.getElementById('bookings-table').querySelector('tbody');

   const movies = [];
   const bookings = [];

   addMovieForm.addEventListener('submit', (e) => {
       e.preventDefault();

       const movieName = document.getElementById('movie-name').value;
       const movieGenre = document.getElementById('movie-genre').value;
       const movieDuration = document.getElementById('movie-duration').value;
       const movieTime = document.getElementById('movie-time').value;

       const movie = {
           name: movieName,
           genre: movieGenre,
           duration: movieDuration,
           time: movieTime
       };

       movies.push(movie);
       addMovieToTable(movie);
       addMovieForm.reset();
   });

   function addMovieToTable(movie) {
       const row = document.createElement('tr');

       row.innerHTML = `
           <td>${movie.name}</td>
           <td>${movie.genre}</td>
           <td>${movie.duration}</td>
           <td>${movie.time}</td>
           <td><button onclick="deleteMovie(this)">Delete</button></td>
       `;

       moviesTable.appendChild(row);
   }

   window.deleteMovie = function(button) {
       const row = button.parentNode.parentNode;
       const index = row.rowIndex - 1;
       movies.splice(index, 1);
       row.remove();
   };

   // This section is for demo purposes to show how bookings can be added
   function addBooking(movieName, user, seats) {
       const booking = {
           movieName,
           user,
           seats
       };

       bookings.push(booking);
       const row = document.createElement('tr');

       row.innerHTML = `
           <td>${movieName}</td>
           <td>${user}</td>
           <td>${seats}</td>
       `;

       bookingsTable.appendChild(row);
   }

   // Adding a demo booking
   addBooking('Demo Movie', 'John Doe', 3);
});
