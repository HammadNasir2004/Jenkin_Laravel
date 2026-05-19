pipeline {
    agent any

    environment {
        DOCKERHUB_CREDENTIALS = credentials('dockerhub-credentials')
        DOCKERHUB_USERNAME    = 'hammad1472'
        IMAGE_NAME            = "${DOCKERHUB_USERNAME}/laravel-app"
        IMAGE_TAG             = "${BUILD_NUMBER}"
        K8S_NAMESPACE         = 'laravel-app'
    }

    stages {

        stage('Checkout') {
            steps {
                echo 'Cloning repository...'
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                echo 'Building Docker image...'
                sh "docker build -t ${IMAGE_NAME}:${IMAGE_TAG} ."
                sh "docker tag ${IMAGE_NAME}:${IMAGE_TAG} ${IMAGE_NAME}:latest"
            }
        }

        stage('Push to DockerHub') {
            steps {
                echo 'Pushing to DockerHub...'
                sh "echo ${DOCKERHUB_CREDENTIALS_PSW} | docker login -u ${DOCKERHUB_CREDENTIALS_USR} --password-stdin"
                sh "docker push ${IMAGE_NAME}:${IMAGE_TAG}"
                sh "docker push ${IMAGE_NAME}:latest"
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                echo 'Deploying to Kubernetes...'
                sh "kubectl apply -f k8s/namespace.yaml"
                sh "kubectl apply -f k8s/mysql-deployment.yaml"
                sh "kubectl apply -f k8s/laravel-deployment.yaml"
                sh "kubectl apply -f k8s/nginx-deployment.yaml"
                sh "kubectl set image deployment/laravel laravel=${IMAGE_NAME}:${IMAGE_TAG} -n ${K8S_NAMESPACE}"
                sh "kubectl rollout status deployment/laravel -n ${K8S_NAMESPACE}"
                sh "kubectl rollout status deployment/nginx -n ${K8S_NAMESPACE}"
            }
        }

        stage('Verify Deployment') {
            steps {
                echo 'Verifying deployment...'
                sh "kubectl get pods -n ${K8S_NAMESPACE}"
                sh "kubectl get services -n ${K8S_NAMESPACE}"
            }
        }
    }

    post {
        success {
            echo "Deployment successful! App running at http://YOUR_EC2_IP:30080"
        }
        failure {
            echo 'Pipeline failed!'
            sh "kubectl rollout undo deployment/laravel -n ${K8S_NAMESPACE}"
        }
        always {
            sh "docker logout"
            sh "docker rmi ${IMAGE_NAME}:${IMAGE_TAG} || true"
        }
    }
}
