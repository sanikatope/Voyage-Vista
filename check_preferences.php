<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Preferences</title>
    <script>
        async function fetchPreferences() {
            const userId = document.getElementById("userId").value;
            const response = await fetch(`get_preferences.php?user_id=${userId}`);
            const data = await response.json();

            if (data.error) {
                document.getElementById("preferences").innerText = data.error;
            } else {
                document.getElementById("preferences").innerText = "Preferences: " + data.preferences;
            }
        }
    </script>
</head>
<body>
    <h1>Check Preferences</h1>
    <input type="text" id="userId" placeholder="Enter Username" />
    <button onclick="fetchPreferences()">Check Preferences</button>
    <div id="preferences"></div>
</body>
</html>
