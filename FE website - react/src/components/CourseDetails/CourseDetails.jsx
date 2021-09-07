import React, { Component, Fragment } from 'react'
import { Col, Container, Row,Button } from 'react-bootstrap'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {faCheckSquare} from '@fortawesome/free-solid-svg-icons'
import {faUser} from '@fortawesome/free-solid-svg-icons'
import {faClock} from '@fortawesome/free-solid-svg-icons'
import {faClipboard} from '@fortawesome/free-solid-svg-icons'
import {faClone} from '@fortawesome/free-solid-svg-icons'
import {faTags} from '@fortawesome/free-solid-svg-icons'
import 'video-react/dist/video-react.css'
import { Player, BigPlayButton } from 'video-react'
import AppUrl from '../../RestAPI/AppUrl.js'
import ReactHtmlParser from 'react-html-parser';
import RestClient from '../../RestAPI/RestClient.js'

 class CourseDetails extends Component {

     constructor(props){
          super();
          this.state={
               MyCourseID:props.id,
               short_title:"...",
               short_description:"...",
               img:"...",
               long_title:"...",
               long_description:"...",
               total_duration:"...",
               total_lecture:"...",
               total_student:"...",
               skill_all:"...",
               video_url:"...",

          }}

          componentDidMount(){
               RestClient.GetRequest(AppUrl.CourseDetail+this.state.MyCourseID).then(result=>{
                    this.setState({ 
                         short_title:result[0]['short_title'],
                         short_description:result[0]['short_description'],
                         img:result[0]['small_img'],
                         long_title:result[0]['long_title'],
                         long_description:result[0]['long_description'],
                         total_duration:result[0]['total_duration'],
                         total_lecture:result[0]['total_lecture'],
                         total_student:result[0]['total_student'],
                         skill_all:result[0]['skill_all'],
                         video_url:result[0]['video_url'],
               });
           })}


     render() {
          return (
             <Fragment>
                  <Container className="mt-5">
                       <Row>
                            <Col lg={8} md={6} sm={12}>
    <h1 className="coruseDetailsText"> {this.state.long_title} </h1>
    <img className="courseDetaisImg" src={this.state.img} alt="" />
    <br></br> <br></br>
    <p className="CoruseallDescription">
    {this.state.long_description}
    </p>
                            </Col>


                            <Col lg={4} md={6} sm={12}>
                         
      <div className="widget_feature">
<h4 class="widget-title text-center">Course Features</h4>
<hr />
<ul>
<li><FontAwesomeIcon className="iconBullent" icon={faUser} /> <span> Enrolled :</span> {this.state.total_student}</li>

<li><FontAwesomeIcon className="iconBullent" icon={faClock} /> <span>Duration :</span> {this.state.total_duration}</li>

<li><FontAwesomeIcon className="iconBullent" icon={faClipboard} /> <span>Lectures :</span> {this.state.total_lecture}</li>

<li><FontAwesomeIcon className="iconBullent" icon={faClone} /> <span>Categories:</span> Technology</li>

<li><FontAwesomeIcon className="iconBullent" icon={faTags} /> <span>Tags:</span> Android, JavaScript</li>

<li><FontAwesomeIcon className="iconBullent" icon={faCheckSquare} /> <span>Instructor:</span> Kazi Ariyan</li>

</ul>
<div class="price-wrap text-center">
<h5>Price:<span>$54.00</span></h5>
<Button variant="warning">ENROLL COURSE</Button>
 
</div>
</div>     
                            </Col> 

                       </Row>
                  </Container>


<br></br><br></br>
               <Container>
                    <Row>
                         <Col lg={6} md={6} sm={12}>

         <div className="widget_feature">
      <h1 className="coruseDetailsText"> Skill You Need  </h1>   
      <hr />
      <ul>
           <li><FontAwesomeIcon className="iconBullent" icon={faCheckSquare} /> Metus interdum metus</li>
           <li><FontAwesomeIcon className="iconBullent" icon={faCheckSquare} /> Ligula cur maecenas</li>

           <li><FontAwesomeIcon className="iconBullent" icon={faCheckSquare} /> Metus interdum metus</li>

           <li><FontAwesomeIcon className="iconBullent" icon={faCheckSquare} />Ligula cur maecenass</li>

           <li><FontAwesomeIcon className="iconBullent" icon={faCheckSquare} /> Metus interdum metus</li>
 
           </ul>           
             </div>
             </Col>


           <Col lg={6} md={6} sm={12}>

           <Player src={this.state.video_url}>
      <BigPlayButton position="center" />
    </Player>
                         </Col>

                    </Row>
               </Container>











             </Fragment>
          )
     }
}

export default CourseDetails
