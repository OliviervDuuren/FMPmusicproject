<?php
$f = fopen('php/boardinfo.txt', 'r');
$line = fgets($f);
fclose($f);

?>


<script type="text/javascript">
    function searchBoard() {
        alert("Searching board");
        setTimeout("stopSearching()", 5000); // after 5 secs
        //var selectBox = document.getElementById("searchBoardSelect");
        // var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        //alert("HEYYY");
        document.getElementById("boardNotFound").style.display = "none";
        document.getElementById("loading").style.display = "block";
        $('#boardSearchingModal').modal('show');
        
        
    }
</script>


<!-- Modal -->
<div class="modal fade" id="boardSearchingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block ">
                <!-- <h5 class="modal-title text-center " id="exampleModalLongTitle1">Geluiden uploaden</h5> -->
                <h5 class="modal-title text-center " id="exampleModalLongTitle2">Zoeken naar bordje</h5>
                <!-- <button type="button" name="submitSounds" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> -->
            </div>
            <div class="modal-body ">
                <div class="lds-ellipsis"  >
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div  >Er is geen bordje actief in de buurt waar de geluiden op kunnen worden gezet!</div>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" id="researchingboard" name="submitSounds" class="btn btn-primary" onclick="searchBoard();">Opnieuw</button>
                <button type="button" name="submitSounds" class="btn btn-primary" data-dismiss="modal">Stop</button>
                <!-- <button <?php if ($_SESSION['role'] == "Child" || $_SESSION['role'] == "Teacher") { ?> disabled <?php } ?> type="button" name="submitSounds" class="btn btn-primary" data-toggle="modal" data-target="#gspeelModal">Upload</button> -->
                <!-- <input id="vordering" type="hidden" value="<?php echo $json_project->id  ?>" name="vordering">
                <button <?php if ($_SESSION['role'] == "Child" || $_SESSION['role'] == "Teacher") { ?> disabled style="display:none;" <?php } ?> type="submit" name="submitProject" class="btn btn-primary" data-toggle="modal" data-target="#gspeelModal">Afronden</button> -->
            </div>
        </div>
    </div>
</div>



<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <select name="" class="btn btn-light colorful-select dropdown-primary" id="searchBoardSelect" onchange="searchBoard();">
                <option class="" value="" selected><?php echo $line; ?></option>
                <?php if($line == "Niet verbonden") { echo "
                <option id='searchingboard'>Zoeken naar bordje</option>"; }
                ?>
            </select>
            <!-- <span>Copyright &copy; Your Website 2020</span> -->
        </div>
    </div>
</footer>
<!-- End of Footer -->

<script type="text/javascript">
    function stopSearching() {
        alert("stop searching");
        document.getElementById("boardNotFound").style.display = "block";
        document.getElementById("loading").style.display = "none";
    }
</script>