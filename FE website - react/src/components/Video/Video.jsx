import React, { Component, Fragment } from 'react'
import { Col, Container, Modal, Row,Button } from 'react-bootstrap'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {faVideoSlash} from '@fortawesome/free-solid-svg-icons'
import 'video-react/dist/video-react.css'
import { Player, BigPlayButton } from 'video-react'
import RestClient from '../../RestAPI/RestClient.js'
import AppUrl from '../../RestAPI/AppUrl.js'
import ReactHtmlParser from 'react-html-parser';



class Video extends Component {

     constructor(){
          super();
          this.state={
               show:false,
               videoURL:"...",
               videoDesc:"...",
          }
     }

     modalClose=()=>this.setState({show:false})
     modalOpen=()=>this.setState({show:true})

     componentDidMount(){
          RestClient.GetRequest(AppUrl.HomeVideo).then(result=>{
               this.setState({videoURL:result[0]['video_url'], videoDesc:result[0]['video_description']});           
          });
      }

     render() {
          return (
              <Fragment>
                   <Container className="text-center">
               <h1 className="serviceMainTitle">OUR VIDEOS</h1>
               <div className="bottom"></div>
                        <Row>
             <Col lg={6} md={6} sm={12} className="videText">
             {ReactHtmlParser(this.state.videoDesc)}
                             </Col>




     <Col lg={6} md={6} sm={12} className="videoCard">
     <FontAwesomeIcon onClick={this.modalOpen}  className="iconProject" icon={faVideoSlash} /> 
     </Col>


                        </Row>
                   </Container>

               
         <Modal size="lg" show={this.state.show} onHide={this.modalClose}>
        
        <Modal.Body>

        <Player src={this.state.videoURL}>
      <BigPlayButton position="center" />
    </Player>

        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={this.modalClose}>
            Close
          </Button>
          
        </Modal.Footer>
      </Modal>
  

              </Fragment>
          )
     }
}

export default Video
