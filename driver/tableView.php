<?php
include '../partials/header.php';

?>
<section class="table">
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col-12 table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Customer</th>
                        <th scope="col">pickup</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Price</th>
                        <th scope="col">Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mohamod jamil</td>
                        <td>Boalkhali</td>
                        <td>GEC more</td>
                        <td>700tk</td>
                        <td>3 min ago</td>
                        <td>
                            <button type="button" class="btn btn-primary" id="btn-accept" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-check"></i></button>
                            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mohamod jamil</td>
                        <td>Boalkhali</td>
                        <td>GEC more</td>
                        <td>700tk</td>
                        <td>3 min ago</td>
                        <td>
                            <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Mohamod jamil</td>
                        <td>Boalkhali</td>
                        <td>GEC more</td>
                        <td>700tk</td>
                        <td>3 min ago</td>
                        <td>
                            <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Mohamod jamil</td>
                        <td>Boalkhali</td>
                        <td>GEC more</td>
                        <td>700tk</td>
                        <td>3 min ago</td>
                        <td>
                            <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <!-- Add more page items as needed -->
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- </div> -->
</section>
<?php
include '../partials/footer.php';
?>