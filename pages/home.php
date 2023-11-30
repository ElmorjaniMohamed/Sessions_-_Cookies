<?php
require '../config/connexion.php';
require '../includes/header.php';
require '../pages/script.php';

if (!isset($_SESSION["user_id"])) {
    header('location: signup.php');
}
?>

<main class="container mx-auto mt-10">
    <div class="flex justify-between items-center ">
        <h1 class="my-4 font-bold text-blue-700">Users <samp class="text-red-500"><?php echo'hello ' . $_SESSION['name'] ; ?></samp></h1>
        <a href="logout.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Logout</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Password
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = getAllUsers();
                foreach ($users as $row) {
                ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row["id"]; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $row["first_name"]; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row["last_name"]; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row["email"]; ?>
                        </td>
                        <td class="px-6 py-4">
                            ******
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-content-arround items-center">
                               
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                               
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                   
                                </svg>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require '../includes/footer.php' ?>
