
export class AppUrl {

    static BaseURL = 'http://127.0.0.1:8000/api'

    static HomeTopTitle = this.BaseURL + '/hometitle';
    static HomeTechDes = this.BaseURL + '/techhome';
    static HomeTotal = this.BaseURL + '/totalhome';
    static HomeVideo = this.BaseURL + '/home/video';

    static ProjectDetail = this.BaseURL + '/projectdetail/';
    static ProjectAll = this.BaseURL + '/projectall';
    static ProjectHome = this.BaseURL + '/projecthome';

    static Service = this.BaseURL + '/service';

    static Information = this.BaseURL + '/information';

    static FooterData = this.BaseURL + '/footerdata';

    static CourseHome = this.BaseURL + '/coursehome';
    static CourseAll = this.BaseURL + '/courseall';
    static CourseDetail = this.BaseURL + '/coursedetail/';

    static ContactSend = this.BaseURL + '/contactsend';

    static ClientReview = this.BaseURL + '/clientreview';

    static ChartData = this.BaseURL + '/chartdata';

}

export default AppUrl
