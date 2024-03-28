<h1>Autocomplete service to search for airports </h1>
<h2>Description</h2>
<p>This repository contains the AirportService, a service for searching airports based on a string query.</p>
<h2>Functionality</h2>
<ul>
  <li>Searches airports based on the provided query.</li>
  <li>Implements caching of search results using Redis to optimize performance.</li>
</ul>
<h2>How to Use</h2>
<ol>
  <li>Ensure you have Docker and Laravel Sail installed.</li>
  <li>Clone this repository to your local machine.</li>
  <li>Run <code>sail up</code> to start the Docker containers.</li>
  <li>Add a JSON file with airport data to the <code>storage/app/public</code> directory.</li>
  <li>Access the API endpoint to search for airports, e.g., <code>http://localhost/api/airports-search?query=(airport_name)</code>.</li>
</ol>
<p>With Docker and Laravel Sail, your application will be up and running, and you can start using the AirportService immediately.</p>
<h2>Testing</h2>
<p>The service is tested using automated tests, covering key usage scenarios and ensuring the correctness of operations.</p>
