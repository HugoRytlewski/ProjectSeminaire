
<div class="fixed z-[10]  lg:top-[43%] lg:left-[6%] bottom-5 left-[50%] translate-x-[-50%] lg:h-48 lg:w-20 h-16 w-48  text-center  ">
    <div class=" rounded-lg flex lg:flex-col l:gap-6 items-center text-center justify-around  lg:justify-between   mt-2 lg:mt-0 h-full shadow-xl	bg-white">
        <button id="button-creer" class=" md:border-r-[3px] md:border-b-0 border-b-[3px] border-black  w-full border-black flex flex-col items-center  justify-center lg:mt-6">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M22 24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h17v24zm-2-4h-14.505c-1.375 0-1.375 2 0 2h14.505v-2zm0-18h-15v16h15v-16zm-3 3v3h-9v-3h9z"/></svg>     
            <p class="font-bold  select-none">Modifier</P>
        </button>
        <button id="button-modif" class="md:border-b-0 md:border-r-[3px] border-b-[3px] border-white  w-full flex flex-col items-center  justify-center lg:mb-6">
            <svg  class=""  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.424 12.282l4.402 4.399-5.826 1.319 1.424-5.718zm15.576-6.748l-9.689 9.804-4.536-4.536 9.689-9.802 4.536 4.534zm-6 8.916v6.55h-16v-12h6.743l1.978-2h-10.721v16h20v-10.573l-2 2.023z"/></svg>
            <p class="font-bold  select-none">Créer</p>
        </button>
    </div>
</div>

<div class="bg-neutral-800 h-[120vh] md:h-[93.97vh] flex md:items-center justify-center ">
    
<div id="menu-modif" class=" hidden flex lg:flex-row lg:justify-between  justify-center lg:items-center items-start md:mt-32 mt-10 lg:mt-0 lg:bg-white rounded-xl h-[40rem] w-[23rem] lg:w-[70vw]">

<div class=" overflow-hidden  h-96 justify-center  text-center flex items-center hidden lg:flex text-[3rem] font-bold w-72  w-[40vw] ">
<div>

    <p class=" select-none w-[20vw]"> Création de la facture </p>
                <div class="flex flex-col jusitfy-center items-center  ">
                    <button id="select_facturee" class=" translate-y-[16px] h-10  p-6 bg-black text-white flex items-center justify-center rounded-xl text-[18px]">
                        <p id="select_facturee">Selectionnez un Congressiste</p> 
                        <svg width="6" height="3" class="ml-2 overflow-visible" aria-hidden="true"><path d="M0 0L3 3L6 0" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                    </button>
                    <div id="drop_facture2" class=" translate-y-[4.75rem] fixed hidden" >
                    <div class="relative w-60  mx-auto bg-neutral-900 rounded-xl shadow-lg h-40 overflow-auto ring-1 ring-slate-900/5 -my-px">
                        <div class="relative">
                            <div class="  ">
                                <?php
                                    foreach ($AllFacture as $uneFacture){
                                        echo "<a  href='?action=Facturation&idd_congressiste=$uneFacture->id_facture&id=$uneFacture->id_congressiste' class='hover:bg-neutral-800 duration-100 h-14 flex   items-center justify-center'>";
                                        echo "<p class=' text-white text-[17px] ' >Facture:$uneFacture->id_congressiste</p>";
                                        echo"</a>";
                                    }
                                ?>
                            </div>
                        </div>   
                    </div>
                </div>
                    <div id="drop_facturee" class=" translate-y-[4.75rem] fixed hidden " >
                        <div class="relative w-60  mx-auto bg-neutral-900 rounded-xl shadow-lg h-40 overflow-auto ring-1 ring-slate-900/5 -my-px">
                            <div class="relative">
                                <div class="  ">
                                    
                                    <?php
                                    foreach($AllCongressiste as $UnCongressiste){
                                        echo"<div id='monElement'>";
                                        echo "<a  href='?action=Facturation&id_congressiste=$UnCongressiste->id_congressiste&create=$UnCongressiste->id_congressiste' id='' class='hover:bg-neutral-800 duration-100 h-14 flex   items-center justify-center'>";
                                        echo "<p class=' text-white text-[17px] ' >Facture:$UnCongressiste->Nom </p>";
                                        echo"</a>";
                                        echo"</div>";
                                    }

                                    ?>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                </div>            

        </div>
        <div class="text-center lg:mr-28 shadow-xl bg-white lg:bg-neutral-800 w-[19.5rem] lg:w-[25vw] h-[28rem] flex flex-col justify-center p-6 rounded-xl ">
            <p class="text-3xl lg:text-white font-bold  ">Facture</p>
         
            <form action="./?action=Facturation" method="POST">
                
                <div class="flex flex-col gap-6 mt-6 cursor-pointed text-left">
                        <?php
                            echo"<div class='flex items-center gap-1'>";
                            echo "<input name='montant' placeholder='$Total'value='$Total' type='text' class='p-2 md:w-96 border  border-2'>";
                            echo" <span class='md:text-white text-xl ml-1 font-bold '>€</span>";  
                            echo"</div>";

                        if(isset($_GET['create'])){
                            echo"<div class='flex items-center gap-1'>";
                            echo "<input name='congressiste' placeholder='Congressiste' value='{$_GET['create']}' type='text' class='p-2 md:w-96 border border-2'>";
                            echo'<svg class="w-4 h-4 ml-1 md:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18"> <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/> </svg>';
                            echo"</div>";

                        }
                           ?>
                        <div class='flex items-center gap-1'>
                        <input name="date" type="date" class="p-2 border md:w-96 border-2" required>
                        <svg class="w-4 h-4 ml-1 md:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">   <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/> </svg>
                        </div>
                        <p class="lg:text-2xl font-bold lg:text-white text-black" >Facture payée ?</p>
                        <div  class="flex gap-6 text-white   lg:flex-row items-center justify-center   ">
                            <P class="font-bold text-black lg:text-white">NON</P>
                            <div id="boutonswitch" class="cursor-pointer flex items-center w-20 h-10 rounded-full border ml-2  bg-neutral-300 p-2">
                                <div id="dd" class="dd rounded-full h-8 w-8 bg-white">
                                </div>
                            </div>
                            <input type="hidden" id="valeurBooleenne" name="valeurBooleenne" value="0">
                            <p class="font-bold text-black lg:text-white">OUI</p>
                        </div>
                        <input class="lg:bg-white bg-black text-white lg:text-black rounded p-2 hover:bg-neutral-300 cursor-pointer duration-200" type="submit" name="cr" id="" value="Créer">
                </div> 
            </form>
        </div>
    </div>
    <div id="menu-creer" class=" flex lg:flex-row lg:justify-between md:overflow-hidden justify-center lg:items-center items-start md:mt-32 mt-10 lg:mt-0 lg:bg-white rounded-xl h-[40rem] w-[23rem] lg:w-[70vw]">
        <div class="   h-96 justify-center hidden md:flex  text-center flex flex-col items-center  lg:flex text-[3rem] font-bold w-72  w-[40vw] ">
            <p class=" select-none w-[20vw]	"> Modification de la facture </p>
            <div class="flex flex-col jusitfy-center items-center  ">
                <button id="select_facture" class="  translate-y-[16px] h-10  p-6 bg-black text-white flex items-center justify-center rounded-xl text-[18px]">
                    <p id="select_facture">Selectionnez la facture</p> 
                    <svg width="6" height="3" class="ml-2 overflow-visible" aria-hidden="true"><path d="M0 0L3 3L6 0" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                </button>
                
                <div id="drop_facture" class=" translate-y-[4.75rem] fixed hidden" >
                    <div class="relative w-60  mx-auto bg-neutral-900 rounded-xl shadow-lg h-40 overflow-auto ring-1 ring-slate-900/5 -my-px">
                        <div class="relative">
                            <div class="  ">
                                <div class="mt-3 flex   mb-4  flex justify-center gap-1">
                                    <a id='tous' href='?action=Facturation&filter=tous ' class="overflow-hidden rounded-full h-6 w-16 bg-neutral-800 hover:bg-neutral-700 cursor-pointer flex items-center justify-center ">
                                        <p   class=" text-[11px] text-white">Tous</p>
                                    </a>
                                    <a id='paid' href='?action=Facturation&filter=paid ' class="overflow-hidden rounded-full h-6 w-16 bg-neutral-800 hover:bg-neutral-700 cursor-pointer flex items-center justify-center ">
                                        <p   class=" text-[11px] text-white">Réglées</p>
                                        </a>
                                    <a id='unpaid' href='?action=Facturation&filter=unpaid '  class="overflow-hidden rounded-full h-6 w-16 bg-neutral-800 hover:bg-neutral-700 cursor-pointer flex items-center justify-center ">
                                        <p  class=" text-[11px] text-white">Impayées</p>
                                     </a>

                                </div>

                                <?php

                                    foreach ($AllFacture as $uneFacture){

                                        echo "<a  href='?action=Facturation&idd_congressiste=$uneFacture->id_congressiste&id=$uneFacture->id_facture' class='hover:bg-neutral-800 duration-100 h-14 flex   items-center justify-center'>";
                                        echo "<p class=' text-white text-[17px] ' >Facture: $uneFacture->Nom</p>";
                                        echo"</a>";
                                    }
                                ?>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-10">
        <div id="drop_facture" class='z-0 md:hidden'  " >
        <p class="text-white font-bold text-center text-xl md:hidden">Choisiser la facture a modifier </p>

            <div class="relative w-60 mt-10  mx-auto bg-white rounded-xl shadow-lg h-40 overflow-auto ring-1 ring-slate-900/5 -my-px">
                <div class="relative">
                    <div class="  ">
                    <div class="mt-3 flex   mb-4  flex justify-center gap-1">
                                    <a id='tous' href='?action=Facturation&filter=tous ' class="overflow-hidden rounded-full h-6 w-16 bg-neutral-800 hover:bg-neutral-700 cursor-pointer flex items-center justify-center ">
                                        <p   class=" text-[11px] text-white">Tous</p>
                                    </a>
                                    <a id='paid' href='?action=Facturation&filter=paid ' class="overflow-hidden rounded-full h-6 w-16 bg-neutral-800 hover:bg-neutral-700 cursor-pointer flex items-center justify-center ">
                                        <p   class=" text-[11px] text-white">Réglées</p>
                                        </a>
                                    <a id='unpaid' href='?action=Facturation&filter=unpaid '  class="overflow-hidden rounded-full h-6 w-16 bg-neutral-800 hover:bg-neutral-700 cursor-pointer flex items-center justify-center ">
                                        <p  class=" text-[11px] text-white">Impayées</p>
                                     </a>

                                </div>
                        <?php
                            foreach ($AllFacture as $uneFacture){
                                echo "<a  href='?action=Facturation&idd_congressiste=$uneFacture->id_congressiste&id=$uneFacture->id_facture' class='hover:bg-neutral-800 duration-100 h-14 flex   items-center justify-center'>";
                                echo "<p class='  text-[17px] ' >Facture: $uneFacture->Nom</p>";
                                echo"</a>";
                            }
                        ?>
                    </div>
                </div>   
            </div>
        </div>
        <div class="text-center lg:mr-28 shadow-xl bg-white  lg:bg-neutral-800 w-[19.5rem] lg:w-[25vw] h-[28rem] items-center flex flex-col justify-center p-6 rounded-xl ">
            <p class="text-3xl lg:text-white font-bold ">Edition Facture</p>
            <form action="?action=Facturation" method="POST" class="w-full">
                <div class="flex flex-col gap-6 mt-6 cursor-pointed text-left ">
                    <?php
                        if (isset($_GET["idd_congressiste"])){ 
                            echo"<p class='lg:text-2xl text-center bg-white rounded text-black font-bold p-2 text-black'>Facture de : $UneFactureId->NomCongressiste</p>";
                            echo"<div class='flex items-center gap-10 text-center justify-center '>";
                            echo "<p class='lg:text-2xl font-bold lg:text-white mt-5  text-black'>Facture payée ?</p>";

                            echo"</div>";
                            echo "<div class='flex gap-6 text-white lg:flex-row items-center justify-center'>";
                            echo "<p class='font-bold text-black lg:text-white'>NON</p>";
                            echo "<div id='boutonswitch2' class='cursor-pointer flex items-center w-20 h-10 rounded-full border ml-2 bg-neutral-300 p-2'>";
                            echo "<div id='dd2' class='dd rounded-full h-8 w-8 bg-white'></div>";
                            echo "</div>";
                            
                            echo "<input type='hidden' name='id_facture' value='$UneFactureId->id_facture'> ";
                            echo "<input type='hidden' id='valeurBooleenne2' name='valeurBooleenne2' value='0'>";
                            echo '<p class="font-bold text-black lg:text-white">OUI</p>';
                            echo '</div>';    
                            if($UneFactureId->StatutPaiement == 0){

                                echo '<input class="lg:bg-white bg-black text-white lg:text-black rounded p-2 hover-bg-neutral-300 cursor-pointer duration-200" type="submit" name="md" value="Modifier">';
                            }
                            if($UneFactureId->StatutPaiement == 1){
                                echo ' <a id="popupDetail" class="text-center lg:bg-white bg-black text-white lg:text-black rounded p-2 hover-bg-neutral-300 cursor-pointer hover:bg-neutral-300   duration-200"> Voir Detail </a>';

                            }
                        }
                        
                    ?>
                </div> 
            </form>  
         
        </div>
    </div>
</div>
<div id="popupDetailScreen" class="fixed h-[50rem] w-[50rem] hidden rounded  bg-neutral-700">
    <div class="justify-center items-center w-full flex flex-col gap-5">
    <h1 class="text-3xl font-bold text-center text-white ">Detail de la facture</h1>
    <div class=" flex flex-col gap-5 text-white translate-x-[10rem] text-left  w-full">
        <p class="gap-2">Nom : <?php echo $DetailFacture['congres'][0]->Nom; ?></p>
        <p class="gap-2">Prénom : <?php echo $DetailFacture['congres'][0]->Prenom; ?></p>
        <p class="gap-2">Hotel: <?php echo $DetailFacture['congres'][0]->NomHotel; ?></p>
        <?php
        
        ?>

        <?php if ($DetailFacture['congres'][0]->Dejeuner == 1): ?>
            <p>Option : Dejeuner</p>
        <?php endif; ?>

        <p class="gap-2">Date : <?php echo $DetailFacture['congres'][0]->Date; ?></p>

        <?php foreach($DetailFacture['activites'] as $uneActivite): ?>
            <p class="gap-2">Activite : <?php echo $uneActivite['NomActivite']; ?></p>
            <p class="gap-2">Prix : <?php echo $uneActivite['MontantActivite']; ?> €</p>
        <?php endforeach; ?>

        <?php foreach($DetailFacture['sessions'] as $uneSession): ?>
            <p class="gap-2">Session : <?php echo $uneSession['NomSession']; ?></p>
            <p class="gap-2">Prix : <?php echo $uneSession['MontantSession']; ?> €</p>
        <?php endforeach; ?>

        <p></p>
        <p class="gap-2 font-bold ">Prix Total : <?php echo $TotalModif; ?> €</p>



    </div>
    <a onclick="pdfOpen('<?php echo $DetailFacture['congres'][0]->Nom; ?>')" href="?action=Facturation&idd_congressiste=<?php echo $DetailFacture['congres'][0]->id_congressiste; ?>&id=<?php echo $DetailFacture['congres'][0]->id_facture; ?>&pdf" class="bg-white hover:bg-neutral-300 duration-200 h-10 w-20 text-black text-center flex items-center justify-center rounded">Voir PDF</a>
        <button id="closePopup" class="h-10 w-20 text-white bg-neutral-900 duration-200 hover:bg-neutral-800 rounded">Fermer</button>

    </div>

    

    
            

</div>


<script src="assets/js/facturation.js"></script>
