using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Diagnostics;
using System.IO;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {

            while (true) {

            var dirName = "C:\\xampp\\htdocs\\uploads";
            string[] files = Directory.GetFiles(dirName);

            foreach (string file in files)
            {
                FileInfo fi = new FileInfo(file);
                if (fi.CreationTime < DateTime.Now.AddHours(-3))
                    fi.Delete();
            }

            dirName = "C:\\xampp\\htdocs\\previews";
            files = Directory.GetFiles(dirName);

            foreach (string file in files)
            {
                FileInfo fi = new FileInfo(file);
                if (fi.CreationTime < DateTime.Now.AddHours(-3))
                    fi.Delete();
            }

            dirName = "C:\\xampp\\htdocs\\subtitles";
            files = Directory.GetFiles(dirName);

            foreach (string file in files)
            {
                FileInfo fi = new FileInfo(file);
                if (fi.CreationTime < DateTime.Now.AddHours(-3))
                    fi.Delete();
            }

            }

        }
    }
}
