<!-- <script>
        function deactivateConfirmButton(button) {

            var form = button.parentNode; // Get the parent form element
            var confirmButton = form.querySelector('.confirm'); // Find the confirm button within the form
            confirmButton.style.backgroundColor = 'lightgreen'; // Change the color of the cancel button
            confirmButton.disabled = true; // Disable the confirm button

            button.textContent = 'Cancelled'; // Change the text of the cancel button
            button.style.backgroundColor = 'lightcoral'; // Change the color of the cancel button
            button.disabled = true; // Disable the cancel button

        }
    </script> -->


<!-- 
      <button onclick="confirmDelete(' . $x->id . ')">Delete</button></td>
                  
    function confirmDelete(id) {
                const confirmationCard = document.getElementById('confirmationCard');
                const confirmButton = document.getElementById('confirmDeleteButton');

                const idd = { i: id };
                let baselink = window.location.origin;
                let link = `${baselink}/Fitfusion/public/memberfeed/deleteFeedback`;

             
                // Show the confirmation card
                confirmationCard.style.display = 'block';

                // Set up the confirm button click event
                confirmButton.onclick = function () {
                    // If user confirms, send AJAX request to delete the feedback
                    $.ajax({
                        type: "POST",
                        url: link, // URL to your controller action
                        data: idd,
                        success: function (response) {
                            // Handle success response
                            alert("Feedback deleted successfully!");
                            // Reload the page or update the feedback list as needed
                        },
                        error: function (xhr, status, error) {
                            // Handle error response
                            alert("Error deleting feedback: " + error);
                        }
                    });

                    // Hide the confirmation card after deletion
                    confirmationCard.style.display = 'none';
                };
            }


</div> -->




<!-- 
// public function deleteFeedback()
        // {
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $id = $_POST['i'];
        //         // Perform the deletion of feedback with the given ID
        //         $feedbacktable = new Memberfeedback;
        //         $feedbacktable->delete($id);
        //         // Respond with success message or error handling as needed
        //         echo json_encode("Feedback deleted successfully!");
        //         exit;
        //     }
        // } -->

<!-- 
        // document.getElementById("workoutname").addEventListener("change", function () {
            //     var selectedValue = this.value;

            //     // Create a new XMLHttpRequest object
            //     var xhr = new XMLHttpRequest();

            //     // Configure it: GET-request for the URL /your-backend-endpoint
            //     let baselink = window.location.origin
            //     let link = `${baselink}/FitFusion/public/viewworkout/getworkoutdetails?selectedValue=` + selectedValue;
            //     xhr.open('GET', link, true);

            //     // Set up a function to handle the response
            //     xhr.onload = function () {
            //         if (xhr.status === 200) {
            //             // Request was successful
            //             var responseData = JSON.parse(xhr.responseText);
            //             console.log('Response from backend:', responseData);

            //             // You can further process the response here
            //             var workoutDetails = responseData['workoutDetails'][0];
            //             var supplements = responseData['supplements'];

            //             // Update UI with workout details
            //             document.getElementById("workoutName").value = workoutDetails['workoutname'];
            //             document.getElementById("workoutType").value = workoutDetails['workouttype'];
            //             document.getElementById("programDuration").value = workoutDetails['programduration'];
            //             document.getElementById("daysPerWeek").value = workoutDetails['daysperweek'];
            //             document.getElementById("trainingLevel").value = workoutDetails['traininglevel'];
            //             document.getElementById("targetGender").value = workoutDetails['targetgender'];

            //             // Update UI with supplements
            //             var supplementsContainer = document.getElementById("supplementsContainer");
            //             supplementsContainer.innerHTML = ""; // Clear previous data
            //             supplements.forEach(function (supplement) {
            //                 var label = document.createElement("label");
            //                 label.textContent = supplement;
            //                 supplementsContainer.appendChild(label);
            //                 supplementsContainer.appendChild(document.createElement("br"));
            //             });

            //             // Update links
            //             var link = document.getElementById("link");
            //             var mylink = document.getElementById("mylink");
            //             link.href = "assignworkout?id=" + workoutDetails['id'];
            //             mylink.href = "viewworkout?id=" + workoutDetails['id'];

            //             // Process exercise data
            //             const table = document.getElementById("exerciseTable");
            //             // Remove all rows except the first one (header row)
            //             const rowCount = table.rows.length;
            //             for (let i = rowCount - 1; i > 0; i--) {
            //                 table.deleteRow(i);
            //             }
            //             // Add new exercise rows
            //             workoutDetails.forEach(function (exercise) {
            //                 addExercise(exercise);
            //             });
            //         } else {
            //             // Request failed
            //             console.log('Error sending value to backend');
            //         }
            //     };

            //     // Send the request
            //     xhr.send();
            // });

            // function deleteWorkout(workoutId) {
            //     if (confirm('Are you sure you want to delete this workout plan?')) {
            //         // If user confirms, redirect to the delete URL
            //         window.location.href = 'viewworkout?id=' + workoutId;
            //     }
            // }
            // var suppliments = document.getElementById(" suppliments");
            // suppliments.value = responseData[0]['suppliments'];
            // <button onclick="deleteWorkout( ' .$x->id. ')"><a href="" id="mylink">Delete</a></button>


//             function removeLastExerciseRow() {
//     const table = document.getElementById('exerciseTable').getElementsByTagName('tbody')[0];
//     const rowCount = table.rows.length;
//     if (rowCount > 1) { // Ensure there's at least one row (excluding the header)
//         table.deleteRow(rowCount - 1); // Remove the last row
//     }
// }

// <button type="button" onclick="removeLastExerciseRow()">Remove Last Exercise</button> -->
