<html>

<head>
 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<script type="text/javascript">
function expandAll(){
  $(".collapsible-header").addClass("active");
  $(".collapsible").collapsible({accordion: false});
}

function collapseAll(){
  $(".collapsible-header").removeClass(function(){
    return "active";
  });
  $(".collapsible").collapsible({accordion: true});
  $(".collapsible").collapsible({accordion: false});
}
</script>

    

<div class="container">
<br /><br />
  <a class="waves-effect waves-light btn" onClick="expandAll();"><i class="material-icons left">fullscreen</i>Expand All</a>
  <a class="waves-effect waves-light btn" onClick="collapseAll();"><i class="material-icons left">fullscreen_exit</i>Collapse All</a>
<br /><br />
        <ul class="collapsible" data-collapsible="expandable">
            <li>
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><a name="987"/>First</a></div>
              <div class="collapsible-body"><p>First Things First</p></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i>Second</div>
              <div class="collapsible-body"><p>Give me a second ...</p></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i>Third</div>
              <div class="collapsible-body"><p>I don't like being a third wheel</div>
            </li>
        </ul>

    </div>
</body>
</html>