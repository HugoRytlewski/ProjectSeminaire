<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Congre</title>
    <link href="assets/css/main.css" rel="stylesheet" />

</head>
<body>  
    <nav>
        <div class="flex w-screen bg-neutral-950 h-14 items-center justify-between">
            <a  href="./?action=accueil" class="text-white ml-5 hover:text-neutral-300 font-bold">Congrès Limoges</a>
            <div  class="hidden md:flex text-white flex  gap-6 mr-5 cursor-pointer">
                <a href="./?action=accueil" class="hover:text-neutral-300">Accueil</a>
                <a href="./?action=Hotellerie" class="hover:text-neutral-300">Hôtellerie</a>
                <a href="./?action=Congressiste" class="hover:text-neutral-300">Congressiste</a>
                <a href="./?action=Facturation" class="hover:text-neutral-300">Facturation</a>
                <a href="./?action=Reglements" class="hover:text-neutral-300">Règlements</a>
                <a href="./?action=Activites" class="hover:text-neutral-300">Activités</a>
                <a href="./?action=Sessions" class="hover:text-neutral-300">Sessions</a>
            </div>
            <div class="md:hidden mr-6	text-white" >
            <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            <svg id="iconOpen"  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </div>
        </div>
        <div id="text1" class="z-[100] fixed h-screen w-screen bg-neutral-800 hidden text-white">
            <div  class="flex flex-col mt-16 items-center h-full w-full gap-10 ">
            <a href="./?action=accueil" class="font-bold text-xl hover:text-neutral-300">accueil</a>
                <a href="./?action=Hotellerie" class="font-bold text-xl hover:text-neutral-300">Hôtellerie</a>
                <a href="./?action=Congressiste" class="font-bold text-xl hover:text-neutral-300">Congressiste</a>
                <a href="./?action=Facturation" class="font-bold text-xl hover:text-neutral-300">Facturation</a>
                <a href="./?action=Reglements" class="font-bold text-xl hover:text-neutral-300">Règlements</a>
                <a href="./?action=Activites" class="font-bold text-xl hover:text-neutral-300">Activités</a>
                <a href="./?action=Sessions" class="font-bold text-xl hover:text-neutral-300">Sessions</a>
            </div>
        </div>

    </nav>