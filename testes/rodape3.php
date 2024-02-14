<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br"> 

<style>

#area_util { 
        width: 780px; /* LARGURA DA AREA UTIL DO SITE */ 
        border: 0px 
} 
#cabecalho { 
        height:100px; 
        text-align:center; 
        border: solid black 1px; 
} 
#corpo { 
        text-align:center; 
        border: 0px; 
} 
#rodape { 
        height:20px; /* ALTURA DO RODAPE - Lembrar de alterar tambem no "rodapeTemp"(logo abaixo) */ 
        text-align:center; 
        border: solid black 1px; 
} 
#rodapeTemp { /*ESTA AREA DEVE TER SOMENTE UMA PROPRIEDADE: padding-bottom */ 
        padding-bottom:20px;  /* Valor igual a altura(height) definida no "rodape"(logo acima). Obs.: tavez precise de algum ajuste se o rodape utilize bordas */ 
} 


</style>


<body> 
<div id="area_util"> 
        <div id="rodapeTemp"> 
                <div id="cabecalho"> 
                  <h1>Topo</h1> 
                </div> 
                <div id="corpo"> 
 
                        <div id="menu"> 
                                <ul class='menu_horizontal'> 
                                        <li>Sem link</li> 
                                        <li><a href='#'>2</a></li> 
                                        <li><a href='#'>3...</a> 
                                                <ul> 
                                                        <li>31</li> 
                                                        <li><a href='#'>32</a></li> 
                                                        <li>33</li> 
                                                </ul> 
                                        </li> 
                                        <li><a href='#'>4...</a> 
                                                <ul> 
                                                        <li>41</li> 
                                                        <li><a href='#'>42</a></li> 
                                                        <li><a href='#'>43...</a> 
                                                                <ul> 
                                                                        <li>431</li> 
                                                                        <li><a href='#'>432...</a> 
                                                                                <ul> 
                                                                                        <li>4321</li> 
                                                                                        <li><a href='#'>4322</a></li> 
                                                                                </ul> 
                                                                        </li> 
                                                                </ul> 
                                                        </li> 
                                                        <li>44</li> 
                                                </ul> 
                                        </li> 
                                </ul> 
                                <br /> 
                                <ul class='menu_vertical'> 
                                        <li>Sem link</li> 
                                        <li><a href='#'>2</a></li> 
                                        <li><a href='#'>3...</a> 
 
                                                <ul> 
                                                        <li>31</li> 
                                                        <li><a href='#'>32</a></li> 
                                                        <li>33</li> 
                                                </ul> 
                                        </li> 
                                        <li><a href='#'>4...</a> 
                                                <ul> 
                                                        <li>41</li> 
                                                        <li><a href='#'>42</a></li> 
                                                        <li><a href='#'>43...</a> 
                                                                <ul> 
                                                                        <li>431</li> 
                                                                        <li><a href='#'>432...</a> 
                                                                                <ul> 
                                                                                        <li>4321</li> 
                                                                                        <li><a href='#'>4322</a></li> 
                                                                                </ul> 
                                                                        </li> 
                                                                </ul> 
                                                        </li> 
                                                        <li>44</li> 
                                                </ul> 
                                        </li> 
                                </ul> 
                        </div> 
 
                        <div id="conteudo"> 
                                conteudo<br /> 
                        </div> 
                </div> 
        </div> 
 
        <div id="rodape"> 
          Rodapé 
        </div> 
</div> 
</body> 
</html>