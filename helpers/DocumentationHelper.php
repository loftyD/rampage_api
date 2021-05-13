<?php
class DocumentationHelper {
  private $resource=[];
  public function resourceIntro($resource, $description, $method="GET") {
    $this->resource[] = "
        <h2><code class=\"text-muted\">".$method."</code>&nbsp;&nbsp;".$resource."</h2>
        <p class=\"lead\">
            ". $description ."
        </p>";
  }

  public function showAlert($title, $class, $content) {
    $this->resource[] = "<div class=\"alert alert-". $class ."\">
              <h4>". $title ."</h4>
              <p class=\"alert-content\">". $content ."</p>
            </div>";
  }

  public function resourceHeaders($params=array()) {
    $resource = "
        <hr />
        <h4>Headers</h4>
    <div class=\"method\">";

    $resource .="
        <div class=\"row margin-0 list-header hidden-sm hidden-xs\">
            <div class=\"col-md-3\"><div class=\"header\">Header</div></div>
            <div class=\"col-md-2\"><div class=\"header\">Value</div></div>
            <div class=\"col-md-2\"><div class=\"header\">Required</div></div>
            <div class=\"col-md-5\"><div class=\"header\">Description</div></div>
        </div>";
    foreach($params as $param) {
      $resource.="
        <div class=\"row margin-0\">
            <div class=\"col-md-3\">
                <div class=\"cell\">
                    <div class=\"propertyname\">
                        ". $param['header'] ." ";
      if($param['required'] == true) {
        $resource.="<span class=\"mobile-isrequired\">[Required]</span>";
      }
      $resource.="
                    </div>
                </div>
            </div>
            <div class=\"col-md-2\">
                <div class=\"cell\">
                    <div class=\"type\">
                        <code>". $param['value'] ."</code>
                    </div>
                </div>
            </div>
            <div class=\"col-md-2\">
                <div class=\"cell\">
                    <div class=\"isrequired\">
                        ";
      if($param['required'] == true) { $resource.="Yes"; } else { $resource.="No"; }
      $resource.="
                    </div>
                </div>
            </div>
            <div class=\"col-md-5\">
                <div class=\"cell\">
                    <div class=\"description\">
                        ". $param['description']."
                    </div>
                </div>
            </div>
        </div>";
    }
    $resource.="</div>";
    $this->resource[] = $resource;
  }


  public function resourceDescribe($params=array()) {
    $resource = "
        <hr />
        <h4>Body</h4>
    <div class=\"method\">";

    $resource .="
        <div class=\"row margin-0 list-header hidden-sm hidden-xs\">
            <div class=\"col-md-3\"><div class=\"header\">header</div></div>
            <div class=\"col-md-2\"><div class=\"header\">Type</div></div>
            <div class=\"col-md-2\"><div class=\"header\">Required</div></div>
            <div class=\"col-md-5\"><div class=\"header\">Description</div></div>
        </div>";
    foreach($params as $param) {
      $resource.="
        <div class=\"row margin-0\">
            <div class=\"col-md-3\">
                <div class=\"cell\">
                    <div class=\"propertyname\">
                        ". $param['property'] ." ";
      if($param['required'] == true) {
        $resource.="<span class=\"mobile-isrequired\">[Required]</span>";
      }
      $resource.="
                    </div>
                </div>
            </div>
            <div class=\"col-md-2\">
                <div class=\"cell\">
                    <div class=\"type\">
                        <code>". $param['type'] ."</code>
                    </div>
                </div>
            </div>
            <div class=\"col-md-2\">
                <div class=\"cell\">
                    <div class=\"isrequired\">
                        ";
      if($param['required'] == true) { $resource.="Yes"; } else { $resource.="No"; }
      $resource.="
                    </div>
                </div>
            </div>
            <div class=\"col-md-5\">
                <div class=\"cell\">
                    <div class=\"description\">
                        ". $param['description']."
                    </div>
                </div>
            </div>
        </div>";
    }
    $resource.="</div>";
    $this->resource[] = $resource;
  }


  public function resourceResponse($params=array()) {
    $resource = "
        <hr />
        <h4>Response</h4>
    <div class=\"method\">
        <h5>Success</h5>
    ";
    $resource.= "<div class=\"success\"><pre>". json_encode($params['success']) ."</pre></div>";

    if(count($params['fail']) > 1) {
      $resource.= "<div class=\"fails\">";

      foreach($params['fail'] as $fail => $failure) {
        $resource.= "<div class=\"fail\">";
        $resource.="<h5>" . $this->getScenario($fail) . "</h5>";
        $resource.="<pre>". json_encode($failure) ."</pre>";
        $resource.="</div>";
      }
      $resource.="</div>";
    }

    $resource .="</div>";
    $this->resource[] = $resource;
  }

  public function authorizationRequired($content) {
    $this->resource[] = $this->showAlert('Authorization Required', 'danger', $content);
  }

  public function authorizationNotRequired() {
    $this->resource[] = $this->showAlert('Authorization Not Required', 'info', "Authorization is not required for this resource.");
  }

  public function outputResource() {
    echo "<div class=\"container\">";
    echo implode("", $this->resource);
    echo "</div>";
  }

  public function displayHeaders($authorizationRequired = false) {

      $params = [
          [
            "header" => "Content-Type",
            "value" => "<code>application/json</code>",
            "required" => true,
            "description" => "All API requests must have <code>Content-Type</code> declared."
          ]
      ];

      if($authorizationRequired) {
        $params[0][1] = [
            "header" => "Authorization",
            "value" =>  "Your secure authorization token which can be found associated to your account on Rampage. NB: Please never reveal this key publicly.",
            "required" => true,
            "description" => "In order to carry out this request your token will need to be supplied with this request."
        ];
      }

      $this->resource[] = $this->resourceHeaders($params);
  }

  public function toCamelCase($str) {
    $label = explode("_", $str);
    
    if (count($label) > 1) {
        $label = array_map('ucfirst', $label);
        $label = implode(" ", $label);
    } else {
        $label = ucfirst($str);
    }
    
    return $label;
  }

  public function getScenario($text) {
    $text = str_replace("on_","",$text);
    $text = $this->toCamelCase($text);
    return $text;
  }

}
