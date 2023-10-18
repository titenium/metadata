<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetMetaData</title>
    <?php require './head.php'; ?>
</head>

<body>
    <?php require './header.php'; ?>
    <div class="container-lg mt-5 mb-5">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="getData" placeholder="Enter Competitors Web Url"
                aria-label="Competitor's WebURL" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button type="button" id="btn1" class="btn btn-outline-success">Get MetaData</button>
            </div>
        </div>
    </div>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>

    <table class="table" id="metaTable" style="display:none">
        <tbody>
            <tr>
                <th scope="row">Title</th>
                <td id="title"></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td id="des"></td>
            </tr>
            <tr>
                <th scope="row">Keywords</th>
                <td id="kw"></td>
            </tr>
            <tr>
                <th scope="row">Viewport</th>
                <td id="viewport"></td>
            </tr>
            <tr>
                <th scope="row">Logo</th>
                <td id="img"></td>
            </tr>
            <tr>
                <th scope="row" colspan="2">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-success" id="downloadCsv" type="button">Download CSV</button>
                    </div>
                </th>
            </tr>
        </tbody>
    </table>
    <?php require './footer.php'; ?>
</body>

</html>