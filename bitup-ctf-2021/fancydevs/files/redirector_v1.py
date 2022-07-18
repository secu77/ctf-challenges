import SimpleHTTPServer
import SocketServer

class FakeRedirect(SimpleHTTPServer.SimpleHTTPRequestHandler):
    def do_GET(self):
        print self.path
        self.send_response(302)
        new_path = 'http://localhost'
        self.send_header('Location', new_path)
        self.end_headers()

SocketServer.TCPServer(("", 8080), FakeRedirect).serve_forever()
