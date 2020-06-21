<div class="form">
    <form action="" method="GET">

        <div class="row">
            <div class="form-group col-sm-3">
                <label style="color: white; font-weight: bold;" >Rechercher par :</label>
                <select name="searchsel" class="form-control" id="exampleSelect1">
                    <option value="village"><b>Village</b></option>
                    <option value="commune"><b>Commune</b></option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label style="color: white; font-weight: bold;" for="exampleInputEmail1">Votre recherche :</label>
                <input type="text" name="name" id="recherche" onkeyup="getdata();" class="form-control" placeholder="Exemple : Namorona ...">
            </div>

            <div class="form-group col-sm-3">
                <label style="color: #002B36;" for="exampleInputEmail1">.</label> <br>
                <input style="font-weight: bold;" type="submit" class="btn btn-success" name="searchbtn" id="" value="Rechercher">
            </div>
        </div>

    </form>
</div>